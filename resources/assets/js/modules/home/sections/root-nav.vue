<template>
  <div class="navi">
    <div class="grid-x">
      <div class="small-3 cell">
        <ul class="tg-list">
          <li class="tg-list-item">
            <h7>Open navigation</h7>
            <input  class="tgl tgl-skewed" id="cb3" type="checkbox"/>
            <label onclick="toggleMenu()" class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb3"></label>
          </li>
        </ul>
      </div>
      <div class="small-9 cell" :class="{'is-toggled': toggled, 'not-toggled': !toggled  }">
        <ul class="left-naved">
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
</template>

<script>

import Flash from '../../../helpers/flash'
import Auth from '../../../store/auth'
import {post} from '../../../helpers/api'
  export default {
    name: "rootnavi",
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
          alert("hallo")
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
