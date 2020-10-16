<template>
  <nav>
    <ul class="container-flex space-center list-unstyled">
      <li class="pure-menu-item">
        <router-link :to="{name: 'home'}" class="text-uppercase c-white">Inicio</router-link>
      </li>
      <li class="pure-menu-item">
        <router-link :to="{name: 'about'}" class="text-uppercase c-white">Nosotros</router-link>
      </li>
      <li class="pure-menu-item">
        <router-link :to="{name: 'archive'}" class="text-uppercase c-white">Archivo</router-link>
      </li>
      <li class="pure-menu-item">
        <router-link :to="{name: 'contact'}" class="text-uppercase c-white">Contacto</router-link>
      </li>
    </ul>
  </nav>
</template>
