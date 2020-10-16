<template>
  <nav class="custom-wrapper" id="menu">
    <div class="pure-menu">
      <a href="#" class="custom-toggle btn-bar" id="toggle"></a>
    </div>
    <ul class="container-flex list-unstyled">
      <li class="pure-menu-item">
        <router-link :to="{name: 'home'}" class="pure-menu-link c-gris-2 text-uppercase">Inicio</router-link>
      </li>
      <li class="pure-menu-item">
        <router-link :to="{name: 'about'}" class="pure-menu-link c-gris-2 text-uppercase">Nosotros</router-link>
      </li>
      <li class="pure-menu-item">
        <router-link :to="{name: 'archive'}" class="pure-menu-link c-gris-2 text-uppercase">Archivo</router-link>
      </li>
      <li class="pure-menu-item">
        <router-link :to="{name: 'contact'}" class="pure-menu-link c-gris-2 text-uppercase">Contacto</router-link>
      </li>
      <li class="pure-menu-item">
        <a href="#" class="pure-menu-link c-gris-2 text-uppercase">|</a>
      </li>
      <li class="pure-menu-item">
        <a href="./login" class="pure-menu-link c-gris-2 text-uppercase">Login</a>
      </li>
    </ul>
  </nav>
</template>
