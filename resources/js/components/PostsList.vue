<template>
  <section class="posts container">
    <posts-list-item v-for="post in items" :post="post" :key="post.id" />
    <article class="post" v-if="! items.length">
      <div class="content-post">
        <h1>No hay publicaciones todavía.</h1>
      </div>
    </article>
  </section>
</template>

<script>
export default {
  props: ["items"]
};
</script>
