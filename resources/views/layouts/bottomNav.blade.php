<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{route('dashboard')}}" class="item {{request()->is('dashboard') ? 'active' :''}}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Dashboard</strong>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Calendar</strong>
        </div>
    </a>
    <a href="{{route('presensi')}}" class="item">
        <div class="col">
            <div class="action-button large" id="camera">
                <ion-icon name="camera" id="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Docs</strong>
        </div>
    </a>
    <a href="{{route('logout')}}" class="item">
        <div class="col">
            <ion-icon name="log-out-outline" role="img" class="md hydrated" aria-label="to-login"></ion-icon>
            <strong>Logout</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->