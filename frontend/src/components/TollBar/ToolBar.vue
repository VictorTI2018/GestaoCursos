<template>
  <header class="header">
    <div class="user-info">
      <span class="user-info_title">{{ username }}</span>
      <img
        id="navbarDropdown"
        role="button"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
        class="user-info_avatar"
        :src="avatar"
        alt="avatar"
      />
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Perfil</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Sair</a>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "tool-bar",
  props: {
    username: {
      type: String
    },
    avatar: {
      type: String
    }
  }
};
</script>

<style >
.header {
  grid-area: header;
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
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.user-info {
  background-color: #fff;
  height: 30px;
  padding: 10px;
  border-radius: 10px;
  margin-right: 20px;
  justify-content: space-between;
  display: flex;
  align-items: center;
}

.user-info_title {
  color: #000;
  font-size: 0.9rem;
  font-weight: bold;
  margin-right: 5px;
}

.user-info_avatar {
  vertical-align: middle;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  margin-right: 5px;
  margin-left: 4px;
}
</style>