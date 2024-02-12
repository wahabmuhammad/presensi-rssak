<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{route('dashboard')}}" class="item {{request()->is('dashboard') ? 'active' :''}}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong style="font-size: 15px">Home</strong>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong style="font-size: 15px">Jadwal</strong>
        </div>
    </a>
    <a href="" class="item">
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
            <strong style="font-size: 15px">Rekap</strong>
        </div>
    </a>
    <a href="{{route('logout')}}" class="item">
        <div class="col">
            <ion-icon name="log-out-outline" role="img" class="md hydrated" aria-label="to-login"></ion-icon>
            <strong style="font-size: 15px">Logout</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->