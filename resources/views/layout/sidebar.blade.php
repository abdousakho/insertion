<div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
  Suivi/évaluation
          </a>
        </div>
        <ul class="nav">
          {{-- li class="active ">
            <a href="./dashboard.html">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li> --}}
          <li>
            <a href="{{ route('administrateurs.index') }}">
             {{--  <i class="fas fa-user-graduate"></i> --}}
             <i class="fas fa-user-friends"></i>
              <p>Administrateur</p>
            </a>
          </li>
         <li>
            <a href="{{ route('gestionnaires.index') }}">
              <i class="fas fa-user-friends"></i>
              <p>gestionnaire</p>
            </a>
          </li>
          <li>
            <a href="{{ route('formations.index') }}">
              <i class="fas fa-sitemap"></i>
              <p>Formations et Module</p>
            </a>
          </li>
          <li>
            <a href="./profil utilisateur.index">
              <i class="fas fa-users"></i>
              <p>beneficiaire</p>
            </a>
          </li>
          <li>
            <a href="./operateurs.index">
              <i class="far fa-address-card"></i>
              <p>Operateurs</p>
            </a>
          </li>
          <li>
            <a href="./demande.index">
              <i class="fas fa-user-friends"></i>
              <p>Demande</p>
            </a>
          </li>
          <li>
            <a href="./liste des formations.index">
              <i class="fas fa-images"></i>
              <p>Liste des formations</p>
            </a>
          </li>
       {{--    <li class="active-pro">
            <a href="./upgrade.html">
              <i class="tim-icons icon-spaceship"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> --}}
        </ul>
      </div>