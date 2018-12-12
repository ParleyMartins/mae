<template lang="pug">
.sidebar.text-secondary(:class="onlyIcons ? 'w-5' : 'w-15'")
    div.collapser(@click="onlyIcons = !onlyIcons")
        i.fa.fa-angle-double-right(v-if="onlyIcons")
        span(v-if="!onlyIcons")
            i.fa.fa-angle-double-left
            span.pl-1 Collapse
    .d-flex
        .d-flex.flex-column
        .d-flex.flex-column(v-if="!onlyIcons")

</template>

<script>
export default {
  data() {
    return {
      onlyIcons: false
    };
  }
};
</script>

<style scoped>
.sidebar {
  background-color: #006494;
  height: 100vh;
}

.w-15 {
  width: 15%;
}

.w-5 {
  width: 5%;
}

.collapser {
  cursor: pointer;
}
</style>
