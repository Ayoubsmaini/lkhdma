@extends('client.layouts.app')
@section('main')


<section class="section-1 py-5">
    <div class="container">
        <h3 class="textR text-center">Derniers emplois</h3>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                            @foreach ($latestJobs as $latestJob)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="d-flex justify-content-between text-center align-items-center card-header bg-R1 text-uppercase fs-5">
                                            <div >{{ $latestJob->title }}</div>
                                            <a href="{{ route('jobDetail', $latestJob->id) }}" class="btn btn-primary btn-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5"/>
                                                    <path fill-rule="evenodd" d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0z"/>
                                                  </svg>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <table class="table  mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center  text-uppercase"> {{ $latestJob->jobType->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center"> {{ $latestJob->location }}</td>
                                                    </tr>
                                                    @if (!is_null($latestJob->salary))
                                                        <tr>
                                                            <td class="text-center fs-5 bg-R1"> {{ $latestJob->salary }} DH</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
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