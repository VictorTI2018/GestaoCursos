<template>
  <aside class="aside">
    <div class="aside_top">
      <div class="aside_row">
        <img class="aside_avatar" :src="avatar" alt="Logo" />
        <span class="mt-3">
          <span class="aside_title">{{ username }}</span>
          <p class="aside_title">{{ email }}</p>
        </span>
      </div>
    </div>
    <div class="topnav">
      <a class="active" href="#home">Home</a>
      <a href="#contact">Cursos</a>
      <a href="#about">Perfil</a>
    </div>
    <div class="aside_footer">
      <p class="aside_title">Versão {{ version }}</p>
    </div>
  </aside>
</template>

<script>
export default {
  name: "v-menu",
  props: {
    avatar: {
      type: String
    },
    username: {
      type: String
    },
    email: {
      type: String
    },
    version: {
      type: String
    }
  },
  methods: {
    menuRoute() {
      return [];
    }
  },

  computed: {
    menu(name) {
      const route = this.$router.resolve({ name }).route;
      return { text: route.meta.title, to: route.path };
    }
  }
};
</script>

<style>
.aside {
  grid-area: aside;
  background: linear-gradient(
    to right top,
    #182239,
    #19233b,
    #1a243d,
    #1c243f,
    #1d2541,
    #1e2542,
    #1e2642,
    #1f2643,
    #1f2643,
    #1f2543,
    #1f2543,
    #1f2443
  );
  display: flex;
  flex-direction: column;
}

.aside_top {
  height: 112px;
  border-bottom: 1px solid #ddd;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.aside_row {
  display: flex;
  align-items: center;
  flex-direction: row;
}

.aside_title {
  font-size: 0.9rem;
  font-weight: bold;
  color: #fff;
  margin-left: 5px;
}

.aside_footer {
  height: 112px;
  border-top: 1px solid #ddd;
  display: flex;
  align-items: center;
  justify-content: center;
}

.aside_avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 5px;
}

.topnav {
  overflow: hidden;

  height: 100%;
  display: flex;
  flex-direction: column;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 1px solid rgba(221, 221, 221, 0.281);
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background: linear-gradient(
    to right top,
    #e04654,
    #db4752,
    #d64850,
    #d1484e,
    #cc494c,
    #cc494b,
    #cd484b,
    #cd484a,
    #d3474a,
    #d84549,
    #de4349,
    #e34148
  );
  color: white;
}
</style>