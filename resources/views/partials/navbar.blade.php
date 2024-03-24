@if (Auth()->user())
<div class="d-flex">
    <div class="dropdown d-none d-sm-inline-block">
        <button type="button" class="btn header-item" id="mode-setting-btn">
            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
        </button>
    </div>

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fw-medium">{{ auth()->user()->name }}</span>
            <i class="mdi mdi-chevron-down d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end p-3">
            <div class="mb-2">
                <a href="/profile/{{ auth()->user()->slug }}" class="font-size-16 mb-4 text-dark"><i class=" fas fa-smile font-size-16 align-middle mx-3"></i>Profile</a>
            </div>
            <hr class="dropdown-divider">
            <form>
                @csrf
                <a href="/logout" class="mt-3 text-dark"><i class="mdi mdi-logout font-size-16 align-middle mx-3"></i> Logout</a>
            </form>
        </div>
    </div>
</div>
@endif
