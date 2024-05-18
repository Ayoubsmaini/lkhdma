@extends('client.layouts.app')
@section('main')
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center " class=""
        data-bg="{{ asset('assets/images/77.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-7 col-xl-8">
                    <h1 class="mb-3">Trouvez Votre Voie Professionnelle</h1>
                    <p class="mb-4">Trouvez la solution qui correspond parfaitement à vos besoins</p>
                    <div class="banner-btn mt-3 mt-md-4">
                        @if(auth()->check()) 
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
    {{-- <section class="text-center mt-2">
        <div class="container">
            <img src="{{ asset('assets/images/zelij.png') }}" style="width: 200px; height: auto;" alt="pattern">
        </div>
    </section> --}}
    <section>
        <div class="container mt-5">
            <div class="row mt-3">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/show.png') }}" class="img-fluid" alt="Logo">
                </div>
                <div class="col-md-6 mt-5">
                    
                    <h3 class="textU">Qui sommes-nous</h3>
                  
                    <p class="text-sm-md" style="text-align: justify;">
                        Bienvenue sur <strong>Lkhdma</strong>, la plateforme dédiée au talent artisanal personnel au Maroc.
                        <br>Lkhdma connecte les talents aux opportunités correspondant à leurs compétences, pour une recherche d'emploi réussie, qu'ils soient artisans expérimentés ou jeunes diplômés.. <br> Développé par 
                        <a href="https://www.linkedin.com/in/ayoub-smaini " target="block">
                        <strong class="textR">Ayoub Smaini</strong>.</a>
                        
                    </p>
                </div>
            </div>
        </div>
    </section>

<section class="section-1 py-5 "> 
    <div class="container">
        <div class="card border-0 shadow p-5">
            <form action="{{ route("jobs") }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @if ($newCategories->isNotEmpty())
                                @foreach ($newCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            {{-- <a href="jobs.html" class="btn btn-primary btn-block">Search</a> --}}
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>
                        
                    </div>
                </div> 
            </form>           
        </div>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">

            @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs').'?category='.$category->id }}"><h4 class="pb-2">{{ $category->name }}</h4></a>
                    <p class="mb-0"> <span>0</span> Available position</p>
                </div>
            </div> 
            @endforeach                
            @endif
        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($featuredJobs->isNotEmpty())
                            @foreach ($featuredJobs as $featuredJob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featuredJob->title }}</h3>
                                        
                                        <p>{{ Str::words(strip_tags($featuredJob->description), 5) }}</p>

                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $featuredJob->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $featuredJob->jobType->name }}</span>
                                            </p>
                                            @if (!is_null($featuredJob->salary))
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $featuredJob->salary }}</span>
                                            </p>
                                            @endif                                            
                                        </div>
    
                                        <div class="d-grid mt-3">
                                            <a href="{{ route('jobDetail',$featuredJob->id) }}" class="btn btn-primary btn-lg">Details</a>
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

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                            @foreach ($latestJobs as $latestJob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestJob->title }}</h3>
                                        
                                        <p>{{ Str::words(strip_tags($latestJob->description), 5) }}</p>

                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $latestJob->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                            </p>
                                            @if (!is_null($latestJob->salary))
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $latestJob->salary }}</span>
                                            </p>
                                            @endif                                            
                                        </div>
    
                                        <div class="d-grid mt-3">
                                            <a href="{{ route('jobDetail',$latestJob->id) }}" class="btn btn-primary btn-lg">Details</a>
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