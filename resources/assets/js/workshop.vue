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
export default {

  data(){
    return {
      flash: Flash.state
    }
  }
}
</script>


<style >
</style>
