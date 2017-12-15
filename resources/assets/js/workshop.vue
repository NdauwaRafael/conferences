<template >
  <div >
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
export default {
create(){
    Auth.initialize();
},
  data(){
    return {
      flash: Flash.state,
      auth: Auth.state
    }
  }
}
</script>


<style >
</style>
