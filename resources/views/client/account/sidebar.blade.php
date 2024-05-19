
<div class="card border  mb-4 p-3">
    <div class="s-body text-center mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class=" text-uppercase">{{ Auth::user()->name }}</h5>
            <p class=" text-danger">{{ Auth::user()->designation }}</p>
        </div>
        
        
       
    </div>
</div>
<div class="card account-nav border  mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('account.profile') }}">Paramètres du compte</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.createJob') }}">Publier une offre d'emploi</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.myJobs') }}">Mes offres d'emploi</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.myJobApplications') }}">Offres auxquelles j'ai postulé</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.savedJobs') }}">Offres sauvegardées</a>
            </li> 
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('account.logout') }}">Déconnexion</a>
            </li>                                                        
        </ul>
    </div>
</div>
```