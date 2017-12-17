<template >
  <div class="home-background">
    <div class="grid-x">
      <div class="medium-6 large-3 cell left-home-navigation" :class="{'vi': toggled, 'vi': !toggled  }">
          <leftnavigationhome ></leftnavigationhome >
      </div>
      <div class="medium-6 large-9 cell">
        <div class="home-content">
            <div class="content">
              <div class="toggle-nav-switch" :class="{'clr': toggled, 'clr': !toggled  }">
                <ul class="tg-list">
                  <li class="tg-list-item">
                    <h7 ><span v-if="toggled">Open</span> <span v-else>Close</span> navigation</h7>
                    <input  class="tgl tgl-skewed" id="cb3" type="checkbox"/>
                    <label @click="toggleMn()" class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb3"></label>
                  </li>
                </ul>
              </div>
              <router-view></router-view>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import leftnavigationhome from './sections/navigation.vue';

export default {
name: 'home',
data(){
  return {
    toggled: true
  }
},

components: {leftnavigationhome },

methods: {
toggleMn(){
  this.toggled = !this.toggled;
}
}
}
</script>
