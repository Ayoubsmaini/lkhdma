@extends('client.layouts.app')

@section('main')
<section class="section-3 py-5  ">
    <div class="container">     
        <div class="row">
            <div class="col-6 col-md-10 ">
                <h3 class="textR">Trouver des emplois</h3>  
            </div>
            <div class="col-6 col-md-2">
                <div class="align-end">
                    <select name="sort" id="sort" class="form-select">
                        <option value="1" {{ (Request::get('sort') == '1') ? 'selected' : '' }}>Recents</option>
                        <option value="0" {{ (Request::get('sort') == '0') ? 'selected' : '' }}>Anciens</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row pt-5">
        
            <div class="col-md-4 col-lg-3 sidebar mb-4">
                <form action="" name="searchForm" id="searchForm">
                    <div class="card boer-0  p-4">
                    
                        <div class="mb-4 d-flex align-items-center">
                            <div class="d-flex px-3 textR align-items-center mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            <input value="{{ Request::get('location') }}" type="text" name="location" id="location" placeholder="Lieu" class="form-control">
                        </div>
                        
                        
    
                        <div class="mb-4 d-flex align-items-center">
                            <div class="d-flex px-3 textR align-items-center mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                                </svg>
                            </div>
                            <select name="category" id="category" class="form-select">
                                <option value="">Categorie</option>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <option {{ (Request::get('category') == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                                      

                        <div class="mb-4 d-flex align-items-center">
                            <div class="d-flex px-3 textR align-items-center mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5M2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </div>
                            <select name="experience" id="experience" class="form-select">
                                <option value="">Experience</option>
                                <option value="1" {{ (Request::get('experience') == 1) ? 'selected' : '' }}>1 An</option>
                                <option value="2" {{ (Request::get('experience') == 2) ? 'selected' : ''  }}>2 Ans</option>
                                <option value="3" {{ (Request::get('experience') == 3) ? 'selected' : ''  }}>3 Ans</option>
                                <option value="4" {{ (Request::get('experience') == 4) ? 'selected' : ''  }}>4 Ans</option>
                                <option value="5" {{ (Request::get('experience') == 5) ? 'selected' : ''  }}>5 Ans</option>
                                <option value="6" {{ (Request::get('experience') == 6) ? 'selected' : ''  }}>6 Ans</option>
                                <option value="7" {{ (Request::get('experience') == 7) ? 'selected' : ''  }}>7 Ans</option>
                                <option value="8" {{ (Request::get('experience') == 8) ? 'selected' : '' }}>8 Ans</option>
                                <option value="9" {{ (Request::get('experience') == 9)  ? 'selected' : '' }}>9 Ans</option>
                                <option value="10" {{ (Request::get('experience') == 10) ? 'selected' : ''  }}>10 Ans</option>
                                <option value="10_plus" {{ (Request::get('experience') == '10_plus') ? 'selected' : ''  }}>10+ Ans</option>
                            </select>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8 col-lg-9 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                        <div class="row">
                            @if ($jobs->isNotEmpty())
                                @foreach ($jobs as $job)
                                <div class="col-md-4">
                                    <div class="card border p-3  mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 text-secondary fs-5 pb-2 mb-0">{{ $job->title }}</h3>
                                            
                                     
    
                                            <div class="bg-light p-3 ">
                                                <p class="mb-0">
                                                 
                                                    <span class="ps-1">{{ $job->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                
                                                    <span class="ps-1">{{ $job->jobType->name }}</span>
                                                </p>
                                                                                         
                                            </div>
    
                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$job->id) }}" class="btn btn-primary btn-lg"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5"/>
                                                    <path fill-rule="evenodd" d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0z"/>
                                                  </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-md-12">
                                    {{ $jobs->withQueryString()->links() }}
                                </div>
                            @else
                            <div class="col-md-12 text-center">Aucun emploi trouvé
                              
                            </div>   
                                                      
                            @endif                           
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
    $("#searchForm").submit(function(e){
        e.preventDefault();

        let url = '{{ route("jobs") }}?';

        let keyword = $("#keyword").val();
        let location = $("#location").val();
        let category = $("#category").val();
        let experience = $("#experience").val();
        let sort = $("#sort").val();

        let checkedJobTypes = $("input:checkbox[name='job_type']:checked").map(function(){
            return $(this).val();
        }).get();

       
        if (keyword != "") {
            url += '&keyword='+keyword;
        }

        
        if (location != "") {
            url += '&location='+location;
        }

       
        if (category != "") {
            url += '&category='+category;
        }

        
        if (experience != "") {
            url += '&experience='+experience;
        }

       
        if (checkedJobTypes.length > 0) {
            url += '&jobType='+checkedJobTypes;
        }

        url += '&sort='+sort;

        window.location.href=url;
        
    });

    $("#sort").change(function(){
        $("#searchForm").submit();
    });

</script>
@endsection