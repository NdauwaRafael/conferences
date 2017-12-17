<template >
  <div class="welcome-banner">
    <div class="flash flash-success">
      {{flash.success}}
    </div>

    <div class="flash flash-error">
      {{flash.error}}
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
