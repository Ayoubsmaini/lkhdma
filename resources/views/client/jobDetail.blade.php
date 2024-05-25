@extends('client.layouts.app')

@section('main')
<section class="section-4 ">    
    <div class="container pt-2">
        <div class="row">
          
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            <div class="col-md-8">
                @include('client.message')
                <div class="card  boreder">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <div>
                                        
                                    </div>
                                    <a href="#">
                                        <h4 class="textR">{{ $job->title }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.3 1.3 0 0 0-.37.265.3.3 0 0 0-.057.09V14l.002.008.016.033a.6.6 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.6.6 0 0 0 .146-.15l.015-.033L12 14v-.004a.3.3 0 0 0-.057-.09 1.3 1.3 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465s-2.462-.172-3.34-.465c-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411"/>
                                              </svg>{{ $job->location }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Description du poste</h4>
                            {!! nl2br($job->description) !!}
                            
                            
                        </div>
                        @if (!empty($job->responsibility))
                        <div class="single_wrap">
                            <h4>Responsabilités</h4>
                            {!! nl2br($job->responsibility) !!}
                        </div>
                        @endif
                  
                        <div class="border-bottom"></div>
                        <div class="pt-3 text-end">
                            
                            @if (Auth::check())
                                <a href="#" onclick="saveJob({{ $job->id }});" class="btn btn-primary">Enregistrer</a>  
                            @else
                                <a href="javascript:void(0);" class="btn btn-secondary disabled">Connectez-vous pour enregistrer</a>
                            @endif

                            @if (Auth::check())
                                <a href="#" onclick="applyJob({{ $job->id }})" class="btn btn-primary">Postuler</a>
                            @else
                                <a href="javascript:void(0);" class="btn btn-primary disabled">Connectez-vous pour postuler</a>
                            @endif
                            

                        </div>
                    </div>
                </div>

                @if (Auth::user())
                   @if (Auth::user()->id == $job->user_id)
                       
                   
                
                <div class="card  boreder mt-4">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">                                    
                                    <h5 class="textR">Candidats</h5>                                    
                                </div>
                            </div>
                            <div class="jobs_right"></div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Date de postulation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($applications->isNotEmpty())
                                    @foreach ($applications as $application)
                                    <tr>
                                        <td>{{ $application->user->name }}</td>
                                        <td>{{ $application->user->email }}</td>
                                        <td>{{ $application->user->mobile }}</td>
                                        <td>{{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center fs-5 " colspan="4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-slash-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.112 5.112a3 3 0 0 0-.17.613C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13H11zm11.372 7.372L4.937 2.937A5.5 5.5 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773a3.2 3.2 0 0 1-1.516 2.711m-.838 1.87-12-12 .708-.708 12 12z"/>
                                            </svg>
                                           
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif 
                @endif
            </div>
            <div class="col-md-4">
                <div class="card  boreder">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h4 class="textR">Résumé de l'emploi</h4>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Publié le : <span>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</span></li>
                                <li>Postes vacants : <span>{{ $job->vacancy }}</span></li>
                                

                                @if (!empty($job->salary))
                                <li>Salaire : <span>{{ $job->salary }}</span></li>
                                @endif

                                <li>Localisation : <span>{{ $job->location }}</span></li>
                                <li>Type d'emploi : <span> {{ $job->jobType->name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card  boreder my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h5 class="textR">Détails de l'entreprise</h5>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Nom : <span>{{ $job->company_name }}</span></li>

                                @if (!empty($job->company_location))
                                <li>Localisation : <span>{{ $job->company_location }}</span></li>

                                @endif

                             

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script type="text/javascript">
function applyJob(id){
    if (confirm("Are you sure you want to apply on this job?")) {
        $.ajax({
            url : '{{ route("applyJob") }}',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success: function(response) {
                window.location.href = "{{ url()->current() }}";
            } 
        });
    }
}

function saveJob(id){
    $.ajax({
        url : '{{ route("saveJob") }}',
        type: 'post',
        data: {id:id},
        dataType: 'json',
        success: function(response) {
            window.location.href = "{{ url()->current() }}";
        } 
    });
}
</script>
@endsection