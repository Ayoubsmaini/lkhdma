@extends('client.layouts.app')

@section('main')
<section class="section-5 ">
    <div class="container py-5">
      
        <div class="row">
            <div class="col-lg-3">
                @include('client.account.sidebar')
            </div>
            <div class="col-lg-9">
                @include('client.message')
                <div class="card border mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="fs-4 textR mb-0">Postes Postulés</h3>
                        </div>
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Date de Candidature</th>
                                            <th scope="col">Candidats</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($jobApplications->isNotEmpty())
                                            @foreach ($jobApplications as $jobApplication)
                                                <tr class="align-middle">
                                                    <td>
                                                        <div class="fw-bold">{{ $jobApplication->job->title }}</div>
                                                        <small class="text-muted">{{ $jobApplication->job->jobType->name }} • {{ $jobApplication->job->location }}</small>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($jobApplication->applied_date)->format('d M, Y') }}</td>
                                                    <td>{{ $jobApplication->job->applications->count() }} Candidatures</td>
                                                    <td>
                                                        <span class="badge {{ $jobApplication->job->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $jobApplication->job->status == 1 ? 'Disponible' : 'Bloqué' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a class="textU p-0 me-2" href="{{ route('jobDetail', $jobApplication->job_id) }}" title="Voir">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                                </svg>
                                                            </a>
                                                            <a class="textU p-0" href="#" onclick="removeJob({{ $jobApplication->id }})" title="Supprimer">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">Aucune candidature trouvée</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="mt-3">
                            {{ $jobApplications->links() }}
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
function removeJob(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce offer ?")) {
        $.ajax({
            url : '{{ route("account.removeJobs") }}',
            type: 'post',
            data: {id: id},
            dataType: 'json',
            success: function(response) {
                window.location.href='{{ route("account.myJobApplications") }}';
            }
        });
    } 
}
</script>
@endsection