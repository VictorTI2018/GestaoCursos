<template>
  <div class="home">
    <tool-bar :username="user.username" :avatar="user.fotos"></tool-bar>
    <v-menu :avatar="user.fotos" :username="user.username" :email="user.email" version="0.0.1"></v-menu>
    <main class="main">
      <section class="content">
        <router-view></router-view>
      </section>
    </main>
    <v-footer></v-footer>
  </div>
</template>

<script>
import ToolBar from "../components/TollBar/ToolBar";
import VFooter from "../components/VFooter/VFooter";
import VMenu from "../components/VMenu/VMenu";
export default {
  name: "home",
  components: {
    ToolBar,
    VFooter,
    VMenu
  },
  data() {
    return {
      user: {}
    };
  },
  mounted() {
    this.user = this.$session.get("user");
  }
};
</script>

<style >
.home {
  height: 100vh;
  display: grid;
  grid-template-areas: "aside header" "aside main" "aside footer";
  grid-template-rows: 90px 1fr 90px;
  grid-template-columns: 240px 1fr;
}

.main {
  grid-area: main;
  height: calc(100vh - 180px);
  padding: 20px;
  background-color: #ddd;
}

.content {
  position: relative;
  height: 100%;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.75);
  overflow-y: scroll;
}
</style>
