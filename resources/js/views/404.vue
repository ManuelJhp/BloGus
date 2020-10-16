<template>
<section class="pages container">
    <div class="page page-about text-center">
        <h1 class="text-capitalize">Página no encontrada</h1>
        <p>Regresar a
            <router-link :to="{name: 'home'}">Inicio</router-link>
        </p>
        <img width="50%" :src="'img/404.jpg'">
    </div>
</section>
</template>
