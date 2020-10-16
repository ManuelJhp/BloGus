<template>
  <section class="pages container">
    <div class="page page-archive">
      <h1 class="text-capitalize">Archivo</h1>
      <p>
        Historial de las publicaciones del blog, a lo largo de su existencia
      </p>
      <div class="divider-2" style="margin: 35px 0;"></div>
      <div class="container-flex space-between">
        <div class="authors-categories">
          <h3 class="text-capitalize">Autores</h3>
          <ul class="list-unstyled">
            <li v-for="author in authors" v-text="author.name"></li>
          </ul>
          <h3 class="text-capitalize">Categorias</h3>
          <ul class="list-unstyled">
            <li v-for="category in categories" class="text-capitalize">
              <category-link :category="category" />
            </li>
          </ul>
        </div>
        <div class="latest-posts">
          <h3 class="text-capitalize">Ultimos posts</h3>
          <p v-for="post in posts">
            <post-link :post="post">{{ post.title }}</post-link>
          </p>
          <h3 class="text-capitalize">Post por Año</h3>
          <ul class="list-unstyled">
            <li v-for="date in archive" class="text-capitalize">
              {{ date.monthname }}
              {{ date.year }}
              <!-- ({{ date.posts }}) -->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      authors: [],
      categories: [],
      posts: [],
      archive: []
    };
  },
  mounted() {
    axios.get("api/archivo").then(res => {
      this.authors = res.data.authors;
      this.categories = res.data.categories;
      this.posts = res.data.posts;
      this.archive = res.data.archive;
    });
  }
};
</script>
