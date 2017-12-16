<template >
  <div class="welcome-banner">
    <div class="flash flash-success">
      {{flash.success}}
    </div>

    <div class="flash flash-error">
      {{flash.error}}
    </div>

    <div class="home-navigation " :class="{'is-toggled': toggled, 'not-toggled': !toggled  }">
      <div class="grid-container navigation-child">
        <div class="right row">
          <div class="large-10 large-offset-2 columns">
            <ul >
              <li >
                <router-link :to="{path: '/'}">
                <a>Instant Conferences</a>
                </router-link>
              </li>

              <li v-if="!check">
                <router-link :to="{path: '/register'}">
                  <a>Register</a>
                </router-link>
              </li>

              <li v-if="!check">
                <router-link :to="{path: '/login'}">
                <a>Login</a>
                </router-link>
              </li>

              <li class="logout-link" v-if="check">
                <a @click.stop="logout">Logout</a>
              </li>


            </ul>

        </div>
      </div>
    </div>
    </div>
    <div class="toggle-nav">
      <el-button @click="toggleMenu()" type="text" icon="el-icon-d-arrow-right">Toggle Navigation</el-button>
    </div>
    <router-view></router-view>
  </div>
</template>


<script>
import Flash from './helpers/flash'
import Auth from './store/auth'
import {post} from './helpers/api'
export default {
created(){
    Auth.initialize();
},
  data(){
    return {
      flash: Flash.state,
      auth: Auth.state,
      toggled: true
    }
  },
  methods: {
      toggleMenu(){
        this.toggled = !this.toggled;
      },
      logout(){
          post('/api/logout')
              .then((res)=>{
              if (res.data.logged_out){
                  Auth.remove()
                  Flash.setSuccess('You have successfully Logged Out!')
                  this.$router.push('/login')
              }
          })
              .catch((err)=>{
                console.log(err);
              })
      }
  },
    computed: {
      check(){
          if(this.auth.api_token && this.auth.user_id){
            return true;
          }
              return false;

      }
    }
}
</script>
