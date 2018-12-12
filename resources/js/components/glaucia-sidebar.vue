<template lang="pug">
.sidebar.text-secondary.w-15
    a.navbar-brand.text-center(href="/")
        img.ml-1(src="/logo-white.jpg", alt="Logo Glaucia Massoterapia", width="100%")

    .d-flex.flex-column.justify-content-between.logout-button
        .d-flex.flex-column.mt-2
            a.nav-link.text-white.mt-2(v-for="item in menu", :href="item.href")
                i.fa-lg.fa-fw(:class="item.icon")
                span.ml-2.text-lg.h5 {{ item.title }}
        button.mt-auto.btn.btn-link.text-white(@click="logout")
            i.fa.fa-sign-out-alt
            span.ml-2 Sair
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      menu: [
        { title: "Agenda", icon: "far fa-calendar-alt", href: "/calendar" },
        { title: "Tipos de Massagem", icon: "fas fa-hands", href: "/calendar" },
        {
          title: "Pacotes",
          icon: "fas fa-hand-holding-usd",
          href: "/calendar"
        },
        { title: "Clientes", icon: "fas fa-users", href: "/calendar" }
      ]
    };
  },
  methods: {
    logout() {
      axios.post("/logout");
      window.location.replace("/login");
    }
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

.logout-button {
  height: 90%;
}
</style>
