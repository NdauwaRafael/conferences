<template >
  <div class="home-background">
    <div class="grid-x">
      <div class="medium-6 large-3 cell left-home-navigation">
          <leftnavigationhome ></leftnavigationhome >
      </div>
      <div class="medium-6 large-9 cell">
        <div class="home-content">
            <div class="content">
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

components: {leftnavigationhome }
}
</script>
