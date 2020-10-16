<template>
  <div>
    <!-- <span>{{ photo.url }}</span> -->
    <img :src="'.' + photo.url" class="img-responsive" />
  </div>
</template>

<script>
export default {
  props: ["photo"]
};
</script>
