<template lang="pug">
div
    h1.border-bottom.m Tipos de massagem
    div.mt-3
        .card(v-for="massage in massages")
            .card-body
                .card-title {{ massage.name }}
                .card-subtitle {{ massage.price }}
                p {{ massage.description }}
</template>

<script>
export default {
  props: ["massages"]
};
</script>
