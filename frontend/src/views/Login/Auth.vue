<template>
  <div class="auth">
    <div class="auth-container">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <form>
              <div class="forn-group">
                <label for="email">E-mail:</label>
                <input
                  type="email"
                  placeholder="Digite seu e-mail..."
                  class="form-control"
                  v-model="auth.email"
                />
              </div>
              <div class="form-group">
                <label for="password">Senha:</label>
                <input
                  type="password"
                  placeholder="Digite sua senha..."
                  class="form-control"
                  v-model="auth.password"
                />
              </div>
            </form>
          </div>
          <div class="card-footer">
            <div class="row">
              <button class="btn btn-primary btn-block" v-on:click="enviar">Entrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "auth",
  data() {
    return {
      auth: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    enviar() {
      const { email, password } = this.auth;
      if (email && password) {
        this.$http
          .post("/api/auth", this.auth)
          .then(res => {
            const { user, token } = res.data;
            if (user && token) {
              this.$session.start();
              this.$session.set("token", token);
              this.$session.set("user", user);
              this.$router.replace("/");
            }
          })
          .catch(err => {
            console.log(err);
          });
      } else {
        alert("Por favor preencha todos os dados");
      }
    }
  }
};
</script>

<style>
.auth {
  height: 100vh;
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
}

.card {
  border: 0;
}

.card-header {
  height: 60px;
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
}
.auth-container {
  position: relative;
  height: 80%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>