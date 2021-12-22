<template>
<div> 
  <!-- Dashboard header -->
  <nav class="navbar navbar-expand-md navbar-light navbar_light">
    <div class="container-fluid m">
      <a class="navbar-brand" href="#" style="visibility:hidden;">Event</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav_collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar_auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Manage</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Internal
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Customers</a></li>
              <li><a class="dropdown-item" href="#">Events</a></li>
              <li><a class="dropdown-item" href="#">Employees</a></li>
            </ul>
          </li>
        </ul>
        <div class="navbar-nav navbar_nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Current user</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
        </div>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <aside class="sidebar">
      <!-- <img src="" /> -->
      <ul class="sidebar_icon">
          <li><i class="fas fa-th-large"></i></li>
          <li><i class="fas fa-user"></i></li>
          <li><i class="fas fa-suitcase"></i></li>
      </ul>

      <ul class="sidebar_info">
          <li><i class="fas fa-bell"></i></li>
          <li>
              <img :src="img" />
          </li>
      </ul>
  </aside>
  <!-- end sidebar -->

  <!-- page area -->
  <div class="graph_area">
      <div class="container">
          <router-view></router-view>
      </div>
  </div>  
  <!-- end page area -->
</div>
</template>

<script>
import img from '../../assets/img/botez_2.jpeg'

export default {
    data() {
        return {
            img: img
        }
    }
};
</script>

<style scoped>

/* navbar css */
.navbar-light .navbar_auto li a.nav-link {
  color: #1a1a1a;
  font-size: 14px;
  font-weight: 500;
  padding: 0.5rem 0.8rem;
}

.navbar_nav .nav-item a.nav-link {
  color: #142535;
  font-size: 14px;
  font-weight: 500;
  padding: 0.5rem 0.8rem;
}

.navbar_light {
  box-shadow: 0 8px 17px 2px rgba(193, 193, 193, 0.14),
    0 3px 14px 2px rgba(185, 185, 185, 0.12),
    0 5px 5px -3px rgba(171, 171, 171, 0.2);

  background: #fff;
}

/* sidebar css */
aside.sidebar {
    position: fixed;
    width: 75px;
    background-color: #fff;
    left: 0;
    top: 0;
    height: 100vh;
    box-shadow: 0 8px 17px 2px rgba(193, 193, 193, 0.14),
    0 3px 14px 2px rgba(185, 185, 185, 0.12),
    0 5px 5px -3px rgba(171, 171, 171, 0.2);
    padding: 1rem 0;
    text-align: center;
}

.sidebar img {
    width: 60px;
}

.sidebar_icon,
.sidebar_info {
    margin-top: 8rem;
    padding: 0;
}


.sidebar_icon {
    padding: 0.5rem;
}

.sidebar_icon li,
.sidebar_info li {
    list-style: none;
    margin:1rem 0;
    padding: 0.5rem 0;
    border-left:2px solid #fff;
    transition: 0.5s ease-in;
}
.sidebar_icon li:hover,
.sidebar_icon li i:hover,
.sidebar_info li i:hover {
    border-color: #049148;
    color: #049148;
    /* opacity: 1; */
}
.sidebar_icon i,
.sidebar_info i {
    color: #888;
    font-size: 24px;
}

.sidebar_info li img {
    width: 30px;
    height: 30px;
    border-radius: 50%
}

@media only screen and (max-width:767px) {
    aside.sidebar {
        width: 50px;
    }
    .navbar_light {
        height: 55px;
    }
    .navbar_light button {
        position: absolute;
        right: 15px;
        z-index: 99;
    }
    .nav_collapse {
        position: absolute;
        top: 54px;
        background-color: #fff;
        z-index: 9;
        width: 75%;
        height: 100vh;
        left: 0;
        right: 0;
        padding: 0 1rem;
    }
}

</style>