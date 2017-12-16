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
  <tbody v-for="workshop in workshops">
    <tr>
      <td>{{workshop.id}}</td>
      <td>{{workshop.when}}</td>
      <td>{{workshop.event_name}}</td>
      <td>{{workshop.theme}}</td>
      <td>{{workshop.audience}}</td>
      <td>
        <router-link :to="`/view/${workshop.id}`">
        <el-button type="success" size="small">Reveal Details</el-button>
        </router-link>
      </td>
    </tr>

  </tbody>
</table>
  </div>
</template>

<script>
import {get} from '../../helpers/api'
export default {
  data() {
      return {
        workshops: [],
      }
  },
//   // computed:{
//   // workshop(){
//   //   return this.$store.getters.workshop;
//   // },
//
//
//
// }

created() {
  get('/api/workshop')
  .then((res)=>{
    this.workshops = res.data.workshop
  })

}
}
</script>

<style lang="css">
</style>
