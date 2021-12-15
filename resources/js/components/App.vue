<template>
<div>
    <div>
        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- offcanvas trigger -->
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
                </button>
                <!-- offcanvas trigger -->
                <a class="navbar-brand me-auto" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto">
                        <div class="input-group my-3 my-lg-0">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-button">
                            <button class="btn btn-success" type="button" id="search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navigation -->
        <!-- offcanvas -->
        <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-body p-0">
                <nav class="navbar-dark">
                    <ul class="navbar-nav">
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">CORE</div>
                        </li>
                        <li>
                            <router-link to="/" exact class="nav-link px-3 active">
                                <span class="me-2 mb-2">
                                   <i class="bi bi-speedometer2"></i>
                                </span>
                                <span>Dashboard</span>
                            </router-link>
                        </li>
                        <li class="my-3">
                            <hr class="dropdown-devider" />
                        </li>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">Interface</div>
                        </li>
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                                <span>Informations</span>
                                <span class="ms-auto right-icon"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <div>
                                    <ul class="navbar-nav px-3">
                                        <li>
                                            <router-link to="/customers" exact class="nav-link px-3">
                                                <span class="me-2 mb-2">
                                                    <i class="bi bi-people"></i>
                                                </span>
                                                <span>Customers</span>
                                            </router-link>
                                        </li>

                                        <li>
                                            <a href="#" class="nav-link px-3">
                                                <span class="me-2 mb-2">
                                                    <i class="bi bi-calendar-event"></i>
                                                </span>
                                                <span>Events</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-3">
                                <span class="me-2 mb-2">
                                   <i class="bi bi-person-bounding-box"></i>
                                </span>
                                <span>Employees</span>
                            </a>
                        </li>

                        <li class="my-3">
                            <hr class="dropdown-devider" />
                        </li>

                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">USER</div>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-3">
                                <span class="me-2 mb-2">
                                   <i class="bi bi-door-open"></i>
                                </span>
                                <span>Login</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-3">
                                <span class="me-2 mb-2">
                                   <i class="bi bi-clipboard-check"></i>
                                </span>
                                <span>Register</span>
                            </a>
                        </li>

                         <li>
                            <a href="#" class="nav-link px-3">
                                <span class="me-2 mb-2">
                                   <i class="bi bi-box-arrow-right"></i>
                                </span>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- end offcanvas -->
    <main id="main">
        <router-view></router-view>
    </main>
</div>
</template>

<script>
export default {
    
}
</script>

<style>
    * {
        font-family: "Roboto", sans-serif !important
    }
    
    :root {
        --offcanvas-width: 240px;
        --topNavbarHeight: 54px;
    }

    .sidebar-nav {
        width: var(--offcanvas-width);
    }

    #main {
        margin-left: var(--offcanvas-width);
    }

    .sidebar-link {
        display: flex;
        align-items: center;

    }

    .sidebar-link .right-icon {
        display: inline-flex;
        transition: all ease 0.4s;
    }

    .sidebar-link[aria-expanded="true"] .right-icon {
        transform: rotate(180deg);
    }

    @media (min-width: 992px) {
        body{
            overflow: auto !important;
        }
        .offcanvas-backdrop::before {
            display: none;
        }

        .sidebar-nav {
            transform:none;
            visibility: visible !important;
            top: var(--topNavbarHeight);
            height: calc(100% - var(--topNavbarHeight));
        }
    }
</style>