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
                            <h3 class="fs-4 textR mb-0">Mes Offres d'Emploi</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Date de Publication</th>
                                        <th scope="col">Candidats</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jobs->isNotEmpty())
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td>
                                                <div class="job-name textU fw-500">{{ $job->title }}</div>
                                                <div class="text-muted">{{ $job->jobType->name }} - {{ $job->location }}</div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                            <td>0 Candidatures</td>
                                            <td>
                                                <span class="badge {{ $job->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $job->status == 1 ? 'Disponible' : 'Bloqué' }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a class="textU  p-0 me-2" href="{{ route('jobDetail', $job->id) }}" title="Voir">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                        </svg>
                                                    </a>
                                                    <a class="textU p-0 me-2" href="{{ route('account.editJob', $job->id) }}" title="Modifier">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                                        </svg>
                                                    </a>
                                                    <a class="textU  p-0" href="#" onclick="deleteJob({{ $job->id }})" title="Supprimer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>                                
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $jobs->links() }}
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
function deleteJob(jobId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce offre")) {
        $.ajax({
            url : '{{ route("account.deleteJob") }}',
            type: 'post',
            data: {jobId: jobId},
            dataType: 'json',
            success: function(response) {
                window.location.href='{{ route("account.myJobs") }}';
            }
        });
    } 
}
</script>
@endsection