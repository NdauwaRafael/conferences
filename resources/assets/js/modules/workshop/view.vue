<template >
  <div>
    <h4 class="heading ">View</h4>
    <table>
  <thead>
    <tr>
      <th >#</th>
      <th > Workshop Date</th>
      <th> Workshop Name</th>
      <th >Theme</th>
      <th >Audience</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody v-for="workshops in workshop">
    <tr>
      <td>1</td>
      <td>{{workshops.eventDate}}</td>
      <td>{{workshops.eventName}}</td>
      <td>{{workshops.eventTheme}}</td>
      <td>{{workshops.eventAudience}}</td>
      <td>
        <router-link :to="{path: '/modify'}">
        <el-button type="info" round>Modify</el-button>
        </router-link>
      </td>
    </tr>

  </tbody>
</table>
  </div>
</template>

<script>
export default {
  computed:{
  workshop(){
    return this.$store.getters.workshop;
  }

}
}
</script>

<style lang="css">
</style>
